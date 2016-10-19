<?php

/**
 * \HomeController
 */
class HomeController extends BaseController
{

    public function home()
    {
        $this->view = View::make('home')->with('user_type', UserType::first())
            ->withTitle('MFFC :-D')
            ->withFuckMe('OK!');


//        $this->mail = Mail::to(['454335025@qq.com'])
//
//            ->from('MotherFucker <ooxx@163.com>')
//
//            ->title('Fuck Me!')
//
//            ->content('<h1>Hello~~</h1>');
    }


}