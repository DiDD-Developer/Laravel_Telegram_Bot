<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditParametrsValidationRequest;
use App\Http\Requests\ParametrsValidationRequest;
use App\Models\TelegramSetting;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class TelegramSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telegramSetting = TelegramSetting::all();
        return view('telegramSetting.index', compact('telegramSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('telegramSetting.create');
    }

    /**
     * @param ParametrsValidationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ParametrsValidationRequest $request)
    {
        TelegramSetting::create($request->validated());
        return redirect()->route('telegram-setting.index')->with(['success'=>true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TelegramSetting $telegramSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TelegramSetting $telegramSetting)
    {
        return view('telegram-setting.edit', compact('telegramSetting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditParametrsValidationRequest $request, TelegramSetting $telegramSetting)
    {
        $telegramSetting->update($request->validated());
        return back()->with(['success'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TelegramSetting $telegramSetting)
    {
        //
    }
}
