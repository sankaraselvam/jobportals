<?php

namespace App\Traits;
use App\ProfileSummary;
use App\Http\Requests\ProfileSummaryFormRequest;
use Illuminate\Http\Request;

trait ProfileSummaryTrait
{

	public function updateProfileSummary($user_id, Request $request)
    {
		ProfileSummary::where('user_id', '=', $user_id)->delete();
		$summary = $request->input('summary');
		$ProfileSummary = new ProfileSummary();
		$ProfileSummary->user_id = $user_id;
		$ProfileSummary->summary = $summary;
		$ProfileSummary->save();
        /*         * ************************************ */
		$this->myProfile();		
        return response()->json(array('success' => true, 'status' => 200,'message'=>"Summary updated successfully... "), 200);
    }

}
