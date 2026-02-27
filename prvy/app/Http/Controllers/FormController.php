<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function showForm() {
        $roles = [
            'student' => 'študent',
            'teacher' => 'učiteľ',
        ];

        $skills = ['PHP', 'JavaScript', 'HTML', 'CSS'];
        
        return view("profile.form", [
            'roles' => $roles,
            'skills' => $skills
        ]);
    }

    function processForm(Request $request) {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'age' => $request->input('age'),
            'role' => $request->input('role'),
            'skills' => $request->input('skills', [])
        ];
        
        $additionalData = [
            'isAdult' => (int) $data['age'] >= 18,
            'skillsCount' => count($data['skills']),
            'roleLabel' => $data['role'] === 'teacher' ? 'učiteľ' : 'študent'
        ];

        return view("profile.show", [
            'data' => $data,
            'additionalData' => $additionalData
            ]);
    }
}