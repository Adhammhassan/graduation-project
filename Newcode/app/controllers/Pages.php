
<?php
class Pages extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }
    public function about() {
        $this->view('about');
    }

    public function Select(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/Select',$data);
    }

    public function hoodie(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/hoodie',$data);
    }
    public function sizing(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/sizing',$data);
    }

    public function printing(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/printing',$data);
        
    }

    public function type(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/type',$data);
    }

    public function emb(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/emb',$data);
    }

    public function hood(){
        $data = [
            'title' => 'Home page'
        ];

        $this->view('users/hood',$data);
    }

    public function level3(){
        $data = [
            'title' => 'Level3'
        ];

        $this->view('users/level3',$data);
        
    }
    public function level1(){
        $data = [
            'title' => 'Level1'
        ];

        $this->view('users/level1',$data);
        
    }
    public function level2(){
        $data = [
            'title' => 'Level2'
        ];

        $this->view('users/level2',$data);
    }
}
