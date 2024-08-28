<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreInvitationCardRequest as ApiStoreInvitationCardRequest;
use App\Http\Requests\Api\UpdateInvitationCardRequest as ApiUpdateInvitationCardRequest;
use App\Models\InvitationCard;
use App\Http\Responses\Response;
use App\Models\Event;
use App\Models\InvitationCardStyle;
use App\Models\Media;
use App\Repositories\Classes\InvitationCardRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InvitationCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $invitationCardService;
    protected $invitationCardRepository;

    public function __construct(InvitationCardRepository $invitationCardRepository)
    {
        // $this->invitationCardService = $invitationCardService;
        $this->invitationCardRepository = $invitationCardRepository;
    }
    public function index()
    {
        return $this->invitationCardRepository->index(); 
    }
    public function styleItem($id)
    {
        //
        $style = [];
        try {
            $style = InvitationCardStyle::query()
            ->with('media')
            ->findOrFail($id);
            $message = "this is $style->style style";
        return Response::Success($style,$message,200);

        } catch (\Exception $e) {
            $message = $e->getMessage();
            return Response::Error($e->getMessage(),$message,400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiStoreInvitationCardRequest $request){


        $validateData = $request->validated();


        return DB::transaction(function () use ($validateData, $request) {

            $media = null;
            if ($request->hasFile('media')) {
                $file = $request->file('media');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $mediaPath = $file->storeAs('InvitationCards', $fileName, 'public');

                $media = Media::create([
                    'media_url' => 'storage/' . $mediaPath
                ]);
            }


            $InvitationCardStyle = InvitationCardStyle::create([
                'media_id' => $media->id,
                'style' => $validateData['style'],
            ]);
            $message = 'Invitation Card Style created successfully';

            return response()->json([
                'message' => $message,
                'Invitation_card_data' => $InvitationCardStyle,
                'image_url' => $media ? url($media->media_url) : null
            ], 201);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiUpdateInvitationCardRequest $request, InvitationCard $invitationCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invitationCard = InvitationCardStyle::findOrFail($id);
        if ($invitationCard->media) {
            Storage::disk('public')->delete(str_replace('storage/', '', $invitationCard->media->media_url));
            $invitationCard->media->delete();
        }
        $invitationCard->delete();
        $message = 'invitationCard deleted successfully';
        return response()->json([
            'message' => $message
        ], 200);
    }
}
