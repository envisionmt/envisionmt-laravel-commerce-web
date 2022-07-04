<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TrackOrder\TrackOrderRequest;
use App\Models\Product;
use App\Repositories\IntroductionTypeRepository;
use App\Repositories\PageRepository;
use App\Repositories\ProductRepository;
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
    private $productRepository;
    /**
     * @var TrackOrderRepository
     */
    private $trackOrderRepository;

    /**
     * Constructor.
     * @param PageRepository $pageRepository
     * @param IntroductionTypeRepository $introductionTypeRepository
     * @param TrackOrderRepository $trackOrderRepository
     */
    public function __construct(PageRepository $pageRepository,
                                IntroductionTypeRepository $introductionTypeRepository,
                                TrackOrderRepository $trackOrderRepository,
                                ProductRepository $productRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->introductionTypeRepository = $introductionTypeRepository;
        $this->trackOrderRepository = $trackOrderRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable|void
     */
    public function index()
    {
        $introduction = $this->introductionTypeRepository->getByColumn('introduction', 'short_name');
        $featureIntroduction = $this->introductionTypeRepository->getByColumn('feature', 'short_name');
        $serviceIntroductions = $this->introductionTypeRepository->getByColumn('services', 'short_name');
        $newProductIntroduction = $this->introductionTypeRepository->getByColumn('new-products', 'short_name');
        $inspiredProductIntroduction = $this->introductionTypeRepository->getByColumn('inspired-products', 'short_name');
        $saleOffIntroduction = $this->introductionTypeRepository->getByColumn('sale-off', 'short_name');
        $featuredProducts = $this->productRepository->where('type', Product::NORMAL_TYPE)->get();
        $newProducts = $this->productRepository->where('type', Product::NEW_TYPE)->limit(4)->get();
        $products = $this->productRepository->limit(8)->get();
        $hotProduct = $this->productRepository->where('type', Product::HOT_TYPE)->first();
        return view('frontend.sites.index', [
            'introduction' => $introduction->introduction,
            'featureIntroduction' => $featureIntroduction->introduction,
            'saleOffIntroduction' => $saleOffIntroduction->introduction,
            'serviceIntroductions' => $serviceIntroductions->introductions,
            'newProductIntroduction' => $newProductIntroduction->introduction,
            'inspiredProductIntroduction' => $inspiredProductIntroduction->introduction,
            'featuredProducts' => $featuredProducts,
            'newProducts' => $newProducts,
            'products' => $products,
            'hotProduct' => $hotProduct,
        ]);
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

    public function about(Request $request)
    {
        $serviceIntroductions = $this->introductionTypeRepository->getByColumn('services', 'short_name');
        $aboutUsIntroduction = $this->introductionTypeRepository->getByColumn('about-us', 'short_name');
        $aboutBottomIntroduction = $this->introductionTypeRepository->getByColumn('about-bottom', 'short_name');
        $aboutTopIntroduction = $this->introductionTypeRepository->getByColumn('about-top', 'short_name');
        return view('frontend.sites.about',[
            'serviceIntroductions' => $serviceIntroductions->introductions,
            'aboutUsIntroduction' => $aboutUsIntroduction->introduction,
            'aboutBottomIntroduction' => $aboutBottomIntroduction->introduction,
            'aboutTopIntroduction' => $aboutTopIntroduction->introduction,
        ]);
    }
}
