<?php

namespace App\Http\Controllers\Admin;

use Auth;
use DB;
use Input;
use Redirect;
use Form;
use App\Language;
use App\JobRole;
use App\FunctionalArea;
use App\Helpers\MiscHelper;
use App\Helpers\DataArrayHelper;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\RoleFormRequest;
use App\Http\Controllers\Controller;
use App\Traits\FunctionalAreaRole;

class RoleController extends Controller
{

    use FunctionalAreaRole;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function indexRoles()
    {
        $languages = DataArrayHelper::languagesNativeCodeArray();
        $functional_areas = DataArrayHelper::defaultFunctionalAreasArray();
        return view('admin.role.index')
                        ->with('languages', $languages)
                        ->with('functional_areas', $functional_areas);
    }

    public function createRole()
    {
        $languages = DataArrayHelper::languagesNativeCodeArray();
        $functional_areas = DataArrayHelper::defaultFunctionalAreasArray();
        return view('admin.role.add')
                        ->with('languages', $languages)
                        ->with('functional_areas', $functional_areas);
    }

    public function storeRole(Request $request)
    {
        

        $role = new JobRole();
        $role->id = $request->input('id');
        $role->lang = $request->input('lang');
        $role->functional_area_id = $request->input('functional_area_id');
        $role->role = $request->input('role');
        $role->is_default = $request->input('is_default');
        $role->role_id = $request->input('role_id');
        $role->is_active = $request->input('is_active');
        $role->save();
        /*         * ************************************ */

        $role->sort_order = $role->id;

        if ((int) $request->input('is_default') == 1) {
            $role->role_id = $role->id;
        } else {
            $role->role_id = $request->input('role_id');
        }

        $role->update();
        /*         * ************************************ */

        flash('Role has been added!')->success();
        return \Redirect::route('edit.role', array($role->id));
        
    }

    public function editRole($id)
    {
        $languages = DataArrayHelper::languagesNativeCodeArray();
        $functional_areas = DataArrayHelper::defaultFunctionalAreasArray();
        $role = JobRole::findOrFail($id);
        return view('admin.role.edit')
                        ->with('languages', $languages)
                        ->with('role', $role)
                        ->with('functional_areas', $functional_areas);
    }

    public function updateRole($id, RoleFormRequest $request)
    {
        $role = JobRole::findOrFail($id);
        $role->id = $request->input('id');
        $role->lang = $request->input('lang');
        $role->functional_area_id = $request->input('functional_area_id');
        $role->role = $request->input('role');
        $role->is_default = $request->input('is_default');
        $role->role_id = $request->input('role_id');
        $role->is_active = $request->input('is_active');
        /*         * ************************************ */
        if ((int) $request->input('is_default') == 1) {
            $role->role_id = $role->id;
        } else {
            $role->role_id = $request->input('role_id');
        }
        /*         * ************************************ */
        $role->update();

        flash('Role has been updated!')->success();
        return \Redirect::route('edit.role', array($role->id));
    }

    public function fetchRolesData(Request $request)
    {
        $role = JobRole::select(['*'])->sorted();
        return Datatables::of($role)
                        ->filter(function ($query) use ($request) {

                            if ($request->has('id') && !empty($request->id)) {
                                $query->where('job_role.id', 'like', "{$request->get('id')}%");
                            }

                            if ($request->has('lang') && !empty($request->lang)) {
                                $query->where('job_role.lang', 'like', "{$request->get('lang')}");
                            }

                            if ($request->has('functional_area_id') && !empty($request->functional_area_id)) {
                                $query->where('job_role.functional_area_id', '=', "{$request->get('functional_area_id')}");
                            }

                            if ($request->has('role') && !empty($request->role)) {
                                $query->where('job_role.role', 'like', "%{$request->get('role')}%");
                            }

                            if ($request->has('is_active') && $request->is_active != -1) {
                                $query->where('job_role.is_active', '=', "{$request->get('is_active')}");
                            }
                        })
                        ->addColumn('functional_area_id', function ($role) {
                            return $role->getFunctionalAreas('functional_areas');
                        })
                        ->addColumn('role', function ($role) {
                            $roledata = str_limit($role->role, 100, '...');
                            $lang = MiscHelper::getLang($role->lang);
                            $direction = MiscHelper::getLangDirection($lang);
                            return '<span dir="' . $direction . '">' . $roledata . '</span>';
                        })
                        ->addColumn('action', function ($role) {
                            /*                             * ************************* */
                            $activeTxt = 'Make Active';
                            $activeHref = 'makeActive(' . $role->id . ');';
                            $activeIcon = 'square-o';
                            if ((int) $role->is_active == 1) {
                                $activeTxt = 'Make InActive';
                                $activeHref = 'makeNotActive(' . $role->id . ');';
                                $activeIcon = 'check-square-o';
                            }
                            return '
				<div class="btn-group">
					<button class="btn blue dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Action
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="' . route('edit.role', ['id' => $role->id]) . '"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
						</li>						
						<li>
							<a href="javascript:void(0);" onclick="deleteRole(' . $role->id . ', ' . $role->is_default . ');" class=""><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>
						</li>
						<li>
						<a href="javascript:void(0);" onClick="' . $activeHref . '" id="onclickActive' . $role->id . '"><i class="fa fa-' . $activeIcon . '" aria-hidden="true"></i>' . $activeTxt . '</a>
						</li>																																		
					</ul>
				</div>';
                        })
                        ->rawColumns(['action', 'role'])
                        ->setRowId(function($role) {
                            return 'roleDtRow' . $role->id;
                        })
                        ->make(true);
        //$query = $dataTable->getQuery()->get();
        //return $query;
    }

    public function makeActiveRole(Request $request)
    {
        $id = $request->input('id');
        try {
            $role = JobRole::findOrFail($id);
            $role->is_active = 1;
            $role->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function makeNotActiveRole(Request $request)
    {
        $id = $request->input('id');
        try {
            $role = JobRole::findOrFail($id);
            $role->is_active = 0;
            $role->update();
            echo 'ok';
        } catch (ModelNotFoundException $e) {
            echo 'notok';
        }
    }

    public function sortRoles()
    {
        $languages = DataArrayHelper::languagesNativeCodeArray();
        return view('admin.role.sort')->with('languages', $languages);
    }

    public function roleSortData(Request $request)
    {
        $lang = $request->input('lang');
        $role = JobRole::select('role.id', 'role.role', 'role.sort_order')
                ->where('role.lang', 'like', $lang)
                ->orderBy('role.sort_order')
                ->get();
        $str = '<ul id="sortable">';
        if ($states != null) {
            foreach ($role as $role) {
                $str .= '<li id="' . $role->id . '"><i class="fa fa-sort"></i>' . $role->role . '</li>';
            }
        }
        echo $str . '</ul>';
    }

    public function roleSortUpdate(Request $request)
    {
        $roleOrder = $request->input('roleOrder');
        $roleOrderArray = explode(',', $roleOrder);
        $count = 1;
        foreach ($roleOrderArray as $roleId) {
            $role = JobRole::find($roleId);
            $role->sort_order = $count;
            $role->update();
            $count++;
        }
    }

    

}
