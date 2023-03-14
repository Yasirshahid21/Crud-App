<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {

        if( $request->hasFile( $fieldname ) ) {

            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();

            }
        //    $image = ->store();
        //    $name = $image;
        //    dd($image);
            return $request->file($fieldname)->store($directory, 'public');

        }

        return null;

    }

}
