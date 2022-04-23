<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function archived()
    {
        return Item::where('archived', '=', true)->get();
    }

    public function store(Request $request)
    {
        try {
            $item = new Item();
            $item->name = $request->name;
            $item->price = $request->price;

            if ($item->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно добавлен!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, int $id) {
        try {
            $item = Item::findOrFail($id);

            if ($item->archived)
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Данный элемент нельзя изменить, т.к. он помещен в архив.'
                ]);
            }

            $item->name = $request->name;
            $item->price = $request->price;

            if ($item->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно обновлен!'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function delete(int $id) {
        try {
            $item = Item::findOrFail($id);

            if ($item->delete())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно удален.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function acquire(int $id) {
        try {
            $item = Item::findOrFail($id);

            if ($item->archived)
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Данный элемент нельзя изменить, т.к. он помещен в архив.'
                ]);
            }

            $item->acquired = true;

            if ($item->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно приобретен.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function archive(int $id) {
        try {
            $item = Item::findOrFail($id);
            $item->archived = true;

            if ($item->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно помещен в архив.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function unarchive(int $id) {
        try {
            $item = Item::findOrFail($id);
            $item->archived = false;

            if ($item->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Элемент был успешно убран из архива.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
