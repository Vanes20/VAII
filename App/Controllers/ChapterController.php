<?php

namespace App\Controllers;

use App\Models\Chapter;
use App\Models\Story;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ChapterController extends BaseController
{
    public function index(Request $request): Response
    {
        $storyId = (int)$request->value('storyId');
        $story = null;

        if ($storyId > 0) {
            $story = Story::getOne($storyId);
            if ($story === null) {
                throw new HttpException(404);
            }
            $chapters = Chapter::getAll('`storyId` = ?', [$storyId], '`number` asc');
        } else {
            $chapters = Chapter::getAll(orderBy: '`storyId` asc, `number` asc');
        }

        return $this->html(['chapters' => $chapters, 'story' => $story]);
    }

    // formulár pre novú kapitolu
    public function add(Request $request): Response
    {
        $chapter = new Chapter();

        $storyId = (int)$request->value('storyId');
        if ($storyId > 0 && Story::getOne($storyId) !== null) {
            $chapter->setStoryId($storyId);
            $chapter->setNumber(Chapter::getCount('`storyId` = ?', [$storyId]) + 1);
        }

        return $this->formResponse($chapter, []);
    }

    // formulár pre úpravu kapitoly
    public function edit(Request $request): Response
    {
        $chapter = $this->getChapterOr404((int)$request->value('id'));
        return $this->formResponse($chapter, []);
    }

    // CREATE + UPDATE
    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');
        $chapter = $id > 0 ? $this->getChapterOr404($id) : new Chapter();

        $storyId = filter_var($request->post('storyId'), FILTER_VALIDATE_INT);
        $number = filter_var($request->post('number'), FILTER_VALIDATE_INT);

        $chapter->setStoryId($storyId === false ? 0 : $storyId);
        $chapter->setTitle(trim((string)$request->post('title')));
        $chapter->setContent(trim((string)$request->post('content')));
        $chapter->setNumber($number === false ? 0 : $number);

        $errors = [];
        if ($storyId === false || Story::getOne($storyId) === null) {
            $errors[] = 'Vyberte existujúci príbeh.';
        }
        if ($chapter->getTitle() === '') {
            $errors[] = 'Názov kapitoly nesmie byť prázdny.';
        } elseif (mb_strlen($chapter->getTitle()) > 150) {
            $errors[] = 'Názov kapitoly môže mať najviac 150 znakov.';
        }
        if ($number === false || $number < 1) {
            $errors[] = 'Číslo kapitoly musí byť celé číslo, minimálne 1.';
        }

        if (count($errors) > 0) {
            return $this->formResponse($chapter, $errors);
        }

        $chapter->save();
        return $this->redirect($this->url('chapter.index', ['storyId' => $chapter->getStoryId()]));
    }

    // DELETE
    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $chapter = $this->getChapterOr404((int)$request->post('id'));
        $storyId = $chapter->getStoryId();
        $chapter->delete();

        return $this->redirect($this->url('chapter.index', ['storyId' => $storyId]));
    }

    private function formResponse(Chapter $chapter, array $errors): Response
    {
        return $this->html([
            'chapter' => $chapter,
            'stories' => Story::getAll(orderBy: '`title` asc'),
            'errors' => $errors,
        ], 'form');
    }

    private function getChapterOr404(int $id): Chapter
    {
        $chapter = Chapter::getOne($id);
        if ($chapter === null) {
            throw new HttpException(404);
        }
        return $chapter;
    }
}