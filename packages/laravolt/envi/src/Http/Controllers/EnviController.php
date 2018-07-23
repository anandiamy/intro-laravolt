<?php
/**
 * Created by PhpStorm.
 * User: javan
 * Date: 7/20/18
 * Time: 3:27 PM
 */

namespace Laravolt\Envi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Dotenv\Dotenv;
use Laravolt\Envi\Models\Env;

class EnviController extends Controller
{
    public function edit()
    {
        $dotenv = new Dotenv(base_path(), '.env');
        $env_list = $dotenv->load();
        $variables = $dotenv->getEnvironmentVariableNames();

        return view('envi::edit', compact('variables'));
    }

    public function update(Request $request)
    {
        $insert = [];
        foreach ($request->except('_token') as $item => $v) {
            $insert[] = [
                'key' => $item,
                'value' => $v
            ];
        }

        Env::truncate();
        Env::insert($insert);

        return redirect()->back()->withSuccess('Berhasil disimpan');
    }
}