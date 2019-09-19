<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\PersonalRequest;
use App\Traits\FilterString;
use App\Traits\FileHandler;
use ReCaptcha\ReCaptcha;

class PersonalController extends Controller
{
    use FilterString, FileHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobSeeker = auth()->user();

        return view('website.pages.personal_identity', compact('jobSeeker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRequest $request)
    {
        $response = (new ReCaptcha(env('RECAPTCHA_SECRET_KEY')))
            ->setExpectedHostname(env('APP_HOSTNAME'))
            ->setExpectedAction('personal_identity')
            ->verify($request->recaptcha_key, $request->ip());

        if (!$response->isSuccess()) {
            return response()->json([
                'message' => 'ReCaptcha Error, tolong ulangi lagi',
                'success' => false
            ], 400);
        }

        $request->merge($this->filterSpace($request->all()));

        $profile = DB::transaction(function () use ($request) {
            $jobSeeker = auth()->user();
            $nameBeforeUpdate = $jobSeeker->name;

            $jobSeeker->update([
                'name' => $request->name,
                'identity_number' => $request->identity_number,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'address' => $request->address,
                'address_village_id' => $request->address_village_id,
                'address_telephone_number' => $request->address_telephone_number,
                'parent_telephone_number' => $request->parent_telephone_number,
                'domicile' => $request->domicile,
                'domicile_village_id' => $request->domicile_village_id,
                'domicile_telephone_number' => $request->domicile_telephone_number,
                'handphone_number' => $request->handphone_number,
                'birth_order' => $request->birth_order,
                'driving_licences' => json_encode($request->driving_licences),
                'religion' => $request->religion,
                'height' => $request->height,
                'weight' => $request->weight,
                'clothes_size' => $request->clothes_size,
                'blood_type' => $request->blood_type,
                'pants_size' => $request->pants_size,
                'shoe_size' => $request->shoe_size,
            ]);

            if ($request->file('photo')) {
                // ada perubahan foto
                $jobSeeker->update([
                    'photo' => $this->uploadFiles($request->file('photo'), 'foto', $request->name, $jobSeeker->photo)
                ]);
            } else {
                // tidak ada perubahan
                if ($nameBeforeUpdate != $jobSeeker->name) {
                    // jika nama berubah maka update nama file
                    $fileNames = explode('-', $jobSeeker->photo);
                    $prefix = $fileNames[0];
                    $suffix = $fileNames[count($fileNames) - 1];
                    $newFileName = $prefix . '-' . str_replace(' ', '-', strtolower($jobSeeker->name)) . '-' . $suffix;

                    Storage::move('uploads/foto/' . $jobSeeker->photo, 'uploads/foto/' . $newFileName);
                    $jobSeeker->update([
                        'photo' => $newFileName
                    ]);
                }
            }

            return $jobSeeker;
        });

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }

        return redirect()->back()->with('message', 'Data berhasil diupdate');
    }

    /**
     * Download Photo
     * @return Illuminate\Http\Response
     */
    public function getPhoto()
    {
        $jobSeeker = auth()->user();
        $path = 'uploads/foto/' . $jobSeeker->photo;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return response()->file(storage_path('app/uploads/foto/' . $jobSeeker->photo));
    }
}
