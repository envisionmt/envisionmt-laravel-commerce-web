<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TrackOrder\TrackOrderRequest;
use App\Repositories\IntroductionTypeRepository;
use App\Repositories\PageRepository;
use App\Repositories\TrackOrderRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{
    /**
     * Repository
     *
     * @var PageRepository
     * @var IntroductionTypeRepository
     */
    private $pageRepository;
    private $introductionTypeRepository;

    /**
     * Constructor.
     * @param PageRepository $pageRepository
     * @param IntroductionTypeRepository $introductionTypeRepository
     * @param TrackOrderRepository $trackOrderRepository
     */
    public function __construct(PageRepository $pageRepository,
                                IntroductionTypeRepository $introductionTypeRepository,
                                TrackOrderRepository $trackOrderRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->introductionTypeRepository = $introductionTypeRepository;
        $this->trackOrderRepository = $trackOrderRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable|void
     */
    public function index()
    {
        return view('frontend.sites.index', []);
    }

    public function page(Request $request, $slug)
    {
        try {
            $item = $this->pageRepository->findBySlug($slug);
            return view('frontend.sites.page', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the page.');
        }

        return redirect()->route('frontend.sites.index');

    }

    /**
     * Display a listing of the resource.
     *
     * @param $language
     * @return \Illuminate\Http\Response
     */
    public function changeLanguage($language)
    {
        App::setLocale($language);
        session()->put('locale', $language);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroductionCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function postTrackNow(TrackOrderRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($this->trackOrderRepository->makeModel()->rules()));
            $item = $this->trackOrderRepository->getByColumn($attributes['track_order_code'], 'track_order_code');
            return view('frontend.sites.post-track-now', compact('item'));
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while find track order.');
        }

        return redirect()->route('frontend.sites.post-track-now');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IntroductionCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function viewTrackNow()
    {
        return view('frontend.sites.view-track-now');
    }


    public function contactUs(Request $request)
    {
        return view('frontend.sites.contact');
    }
}
