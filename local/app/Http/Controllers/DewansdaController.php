namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function show()
    {
        return view('popup');
    }
}