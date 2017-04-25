<?php

use Illuminate\Database\Seeder;
use Larashop\Models\User;
use Larashop\Models\Config;
use Larashop\Models\Schedule;
use Larashop\Models\Place;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('configs')->truncate();
        DB::table('places')->truncate();
        
        $user = new User;

        $user->name = 'admin';
        $user->email = 'contato@preseme.com.br';
        $user->password = bcrypt('preseme');

        $user->save();

        $config = new Config;
        $schedule = new Schedule;

        $config->time = json_encode($schedule->schedules);
        $config->contact_email = 'contato@preseme.com.br';
        $config->text_home = 'Cardiologistas com mais de 30 anos de experiencia, atualizados e participantes de Gongressos médicos,nacionais e internecionais com titulo de especialista pela ASSOCIAÇAO MEDICA BRASILEIRA E SOCIEDADE BRASILEIRA DE CARDIOLOGIA.

            Tratamos de todas patologias que envolvem o sistema cardiovascular, principalmente a insuficiência cardíaca.';

        $config->text_about = $config->text_orientation = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tempus consectetur risus tincidunt aliquam. Sed mattis ligula bibendum quam consequat, vel dapibus purus mattis. Curabitur posuere massa ut nibh volutpat dapibus. Vestibulum condimentum nulla sed porttitor varius. Mauris eget dolor justo. Quisque et purus arcu. Nam tristique nunc ac felis euismod porttitor. In in pharetra ligula. Morbi non hendrerit libero. Nulla a fringilla erat, sed aliquam diam.

Curabitur aliquam lectus efficitur erat laoreet faucibus. Ut ornare, libero ut ornare auctor, arcu sapien gravida dolor, in ultrices lorem lorem a urna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc at neque luctus dui tristique mattis sit amet quis mauris. Vivamus leo nunc, vehicula vitae hendrerit viverra, faucibus non purus. Curabitur sed eros dictum, pellentesque augue nec, porta felis. Nunc non tincidunt nisl.';

        $config->save();

        $place = new Place;

        $place->name = 'Santana';
        $place->phone = '1122391670';
        $place->phone_2 = '1122391805';
        $place->address = 'Rua Voluntários da Pátria, 654, cj 807';
        $place->active = 1;
        $place->save();

        $place2 = new Place;

        $place2->name = 'São Caetano';
        $place2->phone = '1142261890';
        $place2->address = 'Avenida Senador Roberto Simonsen, 832';
        $place2->active = 1;
        $place2->save();

    }
}
