<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index() {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create() {
        return view('admin.sliders.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048',
            'order' => 'nullable|integer',
        ]);
        $data = $request->only(['title', 'description', 'order']);
        $data['active'] = $request->has('active') ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }
        Slider::create($data);
        return redirect()->route('sliders.index')->with('status', 'Slider created!');
    }

    public function edit(Slider $slider) {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider) {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);
        $data = $request->only(['title', 'description', 'order']);
        $data['active'] = $request->has('active') ? 1 : 0;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sliders', 'public');
        }
        $slider->update($data);
        return redirect()->route('sliders.index')->with('status', 'Slider updated!');
    }

    public function destroy(Slider $slider) {
        $slider->delete();
        return redirect()->route('sliders.index')->with('status', 'Slider deleted!');
    }
} 