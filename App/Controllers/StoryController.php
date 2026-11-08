<?php

namespace App\Controllers;

use App\Models\Story;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class StoryController extends BaseController
{
    // READ - zoznam príbehov
    public function index(Request $request): Response
    {
        return $this->html(['stories' => Story::getAll(orderBy: '`id` desc')]);
    }

    // formulár pre nový príbeh
    public function add(Request $request): Response
    {
        return $this->html(['story' => new Story(), 'errors' => []], 'form');
    }

    // formulár pre úpravu príbehu
    public function edit(Request $request): Response
    {
        $story = $this->getStoryOr404((int)$request->value('id'));
        return $this->html(['story' => $story, 'errors' => []], 'form');
    }

    // CREATE + UPDATE - uloženie z formulára
    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');
        $story = $id > 0 ? $this->getStoryOr404($id) : new Story();

        $chapters = filter_var($request->post('chapters'), FILTER_VALIDATE_INT);

        $story->setTitle(trim((string)$request->post('title')));
        $story->setDescription(trim((string)$request->post('description')));
        $story->setStatus((string)$request->post('status'));
        $story->setChapters($chapters === false ? 0 : $chapters);

        $errors = [];
        if ($story->getTitle() === '') {
            $errors[] = 'Názov príbehu nesmie byť prázdny.';
        } elseif (mb_strlen($story->getTitle()) > 150) {
            $errors[] = 'Názov príbehu môže mať najviac 150 znakov.';
        }
        if (!in_array($story->getStatus(), ['draft', 'published'], true)) {
            $errors[] = 'Neplatný stav príbehu.';
        }
        if ($chapters === false || $chapters < 0) {
            $errors[] = 'Počet kapitol musí byť celé číslo, minimálne 0.';
        }

        if (count($errors) > 0) {
            return $this->html(['story' => $story, 'errors' => $errors], 'form');
        }

        $story->save();
        return $this->redirect($this->url('story.index'));
    }

    // DELETE
    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }
        $story = $this->getStoryOr404((int)$request->post('id'));
        $story->delete();
        return $this->redirect($this->url('story.index'));
    }

    private function getStoryOr404(int $id): Story
    {
        $story = Story::getOne($id);
        if ($story === null) {
            throw new HttpException(404);
        }
        return $story;
    }
}