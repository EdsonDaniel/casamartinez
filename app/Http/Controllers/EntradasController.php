<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\StoreEntrada;
use App\Entrada;
use App\Productos;
use App\PresentacionesProducto;


class EntradasController extends Controller
{
    public function index()
    {
        return view('admin.listaEntradas');
    }
    public function create()
    {
        $productos = Productos::all();
        return view('admin.addEntrada')->with('productos', $productos);
    }
    public function store(StoreEntrada $request)
    {
        $validated = $request->validated();
        $nueva_entrada = Entrada::create($validated);
        //http://localhost:8000/info-producto
        //$cliente = new Client(['base_uri' => $]);
        //$res = $this->peticion('GET',"https://apidsos1997.000webhostapp.com/api/auth/buscar/{$nombre_act}");
        //$datos = json_decode($res);
        //return response()->json($datos);
        return response('Datos actualizados correctamente.', 200);
    }
    public function generarQR($id_entrada){
        $logo = $this->uploadLogoQr();
        $url_qr = 'https://casamartinez.mx/info-producto/' . $id_entrada;
        $url_api = 'https://www.qrcode-monkey.com/';
        $configQR = array();
        $configQR['body'] = 'circle-zebra-vertical';
        $configQR['eye']  = 'frame13';
        $configQR['eyeBall'] = 'ball15';
        //recuperando logo para QR
        
        $configQR[]
    }
    public function uploadLogoQr(){
        $url_api = 'https://www.qrcode-monkey.com/qr/uploadImage';
        $logo = Storage::get('/public/img/logo.jpg');

        $response = $this->peticion('POST', $url_api,[
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => $logo
                ]
            ]
        ]);
        $data = json_decode($response);
        $logo_name = $data['file'];
        return $logo_name;
    }
    public function show($id)
    {
        $entrada = Productos::find($id);
        $presentaciones = PresentacionesProducto::where('producto_id',$id)->get();
        $caracteristicas = Productos::find($id)->caracteristicas()->orderBy('nombre')->get();
        $all_caract = OtrasCaracteristicas::all();
             return view('admin.detalle_producto',
            ['producto' => $producto, 'presentaciones' => $presentaciones, 'carac' => $caracteristicas, 'all_caract' => $all_caract]);
    }
    public function edit($id)
    {
        
    }

    public function detalleProducto(Request $request){
        return view('infoProducto');
    }

    public function getDataAjax()
    {
        $productos = TodosProductos::where('estado_presentacion','>',0)->get();
        return response()->json($productos);
    }
    public function getDataAjaxBaja()
    {
        $productos = TodosProductos::where('estado_presentacion', '<', 1)->get();
        return response()->json($productos);
    }

    protected function peticion($metodo,$url,$parametros=[]){
        $cliente = new Client;
        $respuesta = null;
        try{
            $respuesta = $cliente->request($metodo,$url,$parametros);
        }catch(GuzzleException $e){
            $s = 'Ocurrió un error al procesar los datos';
            return redirect()->to('/admin/entradas');
        }
        
        return $respuesta->getBody()->getContents();
    }
}
