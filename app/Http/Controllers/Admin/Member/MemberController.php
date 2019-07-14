<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use App\Http\Models\Member;
use App\Http\Requests\Members\StoreMember;
use App\Http\Requests\Members\UpdateMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    private $member;

    /**
     * NewsController constructor.
     * @param Member $member
     */
    public function __construct(Member $member)
    {
        $this->member = $member;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = $this->member
            ->orderBy('id', 'desc')
            ->search($request->input('search'), ['id', 'first_name', 'surname', 'city'])
            ->paginate(15);
        return view('admin.pages.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMember $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMember $request)
    {
        $member = $this->member->fill($request->except('images'));
        $member->save();
        foreach ($request->input('images', []) as $image){
            if(isset($image['image'])){
                $member->images()->create([
                    'name' => $image['name'],
                    'image' => $image['image'],
                ]);
            }
        }
        return redirect()->route('admin.members.edit', $member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Member $member)
    {
        return view('admin.pages.members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMember $request
     * @param Member $member
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMember $request, Member $member)
    {
        $member->fill($request->except('images'));
        $member->save();
        $member->images()->delete();
        foreach ($request->input('images', []) as $image){
            if(isset($image['image'])){
                $member->images()->create([
                    'name' => $image['name'],
                    'image' => $image['image'],
                ]);
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return Response
     * @throws \Exception
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back();
    }


}
