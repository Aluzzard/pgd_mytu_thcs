<?php
namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
//Model
use App\Models\MainStructure\SysFunctionPermissionsAccordingToUser;
use App\Models\MainStructure\SysWebsiteInformation;
use App\Models\Modules\ModuleArticlesCategories;
use App\Models\Modules\ModuleVisitor;
use App\Models\Modules\ModuleBannerFooter;

use App\Http\Controllers\Modules\UICounterVisitors\UICounterVisitorsController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::useBootstrap();
        
        if(env('APP_ENV') !== 'local' && request()->getHttpHost() === env('APP_URL')) {
            URL::forceScheme('https');
        }
        //Get function permission data for following page below
        view()->composer(['mainstructure.pages.users.*', 'modules.*', 'auth.*'], function($view) {
            $id_current_user = Auth::guard('user')->id();
            $function_permissions_according_to_user = SysFunctionPermissionsAccordingToUser::whereUserId($id_current_user)->first();
            if($function_permissions_according_to_user){
                $data['function_permissions_according_to_user'] = explode(",", $function_permissions_according_to_user->function_permissions );
            } else {
                $data['function_permissions_according_to_user'] = "";
            }
            $view
                    ->with($data);
        });
        //Get function permission data for following page below
        view()->composer('*', function($view) {
            $data['information_website'] = SysWebsiteInformation::find(1);
            $view
                    ->with($data);
        });
        view()->composer(['guests.*'], function($view) {
            $data['banner_footer'] = ModuleBannerFooter::whereIsActive(1)->get();
            $data['menus'] = ModuleArticlesCategories::where('status',1)->where('show_h_menu',1)->where('id_parent',0)->orderBy('display_h_order')->get();
                $view->with($data);
            
            UICounterVisitorsController::index();
            $visitor = ModuleVisitor::get();
            $view->with('visitor', $visitor);
        });
    }

    //--------------------CounterVisit---------------------
    public function CounterVisitors(){
        // $check_visited = Session::get('visited');
        $counter_day = ModuleVisitor::where('name','today')->first();
        $date_day = strtotime($counter_day->updated_at);
        $counter_week = ModuleVisitor::where('name','week')->first();
        $date_week = strtotime($counter_week->updated_at);
        $counter_month = ModuleVisitor::where('name','month')->first();
        $date_month = strtotime($counter_month->updated_at);
        $counter_year = ModuleVisitor::where('name','year')->first();
        $date_year = strtotime($counter_year->updated_at);
        $counter_total = ModuleVisitor::where('name','total')->first();
        // Session::put('visited', 1);
        //session_start();
        //unset($_SESSION['visited']); 
        if(!isset($_SESSION)) { 
          session_start(); 
        }  
        if( !isset( $_SESSION['visited'] ) ) {
            $_SESSION['visited'] = 1;
            // Counter ToDay
            if( date("d") == date("d", $date_day) ){
                $counter_day->increment('counter');
            } else {
                $counter_day->counter = 1;
                $counter_day->update();
            }
            // Counter ByWeek
            if( date("W") == date("W", $date_week) ){
                $counter_week->increment('counter');
            } else {
                $counter_week->counter = 1;
                $counter_week->update();
            }
            //Counter ByMonth
            if( date("m") == date("m", $date_month) ){
                $counter_month->increment('counter');
            } else {
                $counter_month->counter = 1;
                $counter_month->update();
            }
            //Counter ByYear
            if( date("Y") == date("Y", $date_year) ){
                $counter_year->increment('counter');
            } else {
                $counter_year->counter = 1;
                $counter_year->update();
            }
            //Counter Total
            $counter_total->increment('counter');
        }     
    }//--------------------CounterVisit---------------------    

}
