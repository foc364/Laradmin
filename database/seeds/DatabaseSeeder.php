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

        $user->name = 'Admin';
        $user->email = 'presemem@gmail.com';
        $user->password = bcrypt('irnmoreno');

        $user->save();

        $config = new Config;
        $schedule = new Schedule;

        $config->time = json_encode($schedule->schedules);
        $config->contact_email = 'presemem@gmail.com';
        $config->text_about = '<p>
        Cardiologistas com mais de 30 anos de experiencia, atualizados e participante de congressos médicos, nacionais e internacionais com titulo de especialista pela ASSOCIAÇAO MEDICA BRASILEIRA E SOCIEDADE BRASILEIRA DE CARDIOLOGIA.
        </p>

            <p>
            Tratamos de todas patologias que envolvem o sistema cardiovascular, principalmente a insuficiência cardíaca.
            </p>';

        $config->text_orientation = '<p>
Os exercícios físicos são importantíssimos, porque também atuam diretamente em três fatores de risco: ajudam a manter o peso adequado, são essenciais no tratamento da diabetes, pois reduzem a resistência à insulina e podem auxiliar no tratamento da pressão alta. Porém, é necessário um programa de atividade física eficaz, sem interrupções por qualquer motivo fútil (hoje chove, amanhã faz frio, semana que vem tenho compromisso…).
</p>

<p>
É algo que deve ser assumido como qualquer outro habito na nossa vida. E importante: adaptar o exercício a nossa condição física: pouco efeito terá uma pessoa com problema de joelho tentar praticar corrida ou alguém com doença do quadril tentar jogar futebol. É desistência na certa. Se tenho problema de coluna porque não praticar pilates associado a natação. Se a musculação me parece repetitiva porque não tentar uma arte marcial ou esporte de luta?
</p>';

        $config->text_orientation_1 ='<p>
<b>Dê adeus ao cigarro</b>
</p>

<p> 
Fumar danifica as artérias, fazendo que o LDL se fixe com mais facilidade às suas paredes. Além disso, eleva a pressão arterial, o que também agride os vasos sanguíneos. Fora o risco de câncer, de envelhecimento precoce e tantos outros prejuízos. Procure orientação médica. 
</p>';

        $config->text_orientation_2 = '<p>
<b>Chega de noites mal dormidas</b>
</p>
          
<p>
Novos estudos encontraram uma associação entre poucas horas de sono (menos de oito horas) e a presença de marcadores no sangue indicando alto risco de doenças cardiovasculares. É mais um motivo para buscar auxílio especializado a fim de superar noites em claro.
</p>';

        $config->text_orientation_3 = '<p>
<b>Administre o estresse</b>
</p>
          
<p>
Sob efeito da adrenalina a pressão arterial sobe e ocorrem alterações no metabolismo capazes de desencadear a aterosclerose. Por isso é importante ter momentos de paz e lazer. Invista em meditação, massagem, atividades manuais, vá ao cinema, ouça música, leia, converse com amigos. Reserve espaço no seu dia para uma atividade relaxante..
</p>';


        $config->save();

        $place = new Place;

        $place->name = 'Consultório Santana';
        $place->phone = '1122391670';
        $place->phone_2 = '1122391805';
        $place->address = 'Rua Voluntários da Pátria, 654, cj 807';
        $place->city = 'São Paulo - SP';
        $place->active = 1;
        $place->save();

        $place2 = new Place;

        $place2->name = 'Consultório São Caetano';
        $place2->phone = '1142261890';
        $place2->address = 'Avenida Senador Roberto Simonsen, 832';
        $place2->city = 'São Caetano Do Sul - SP';
        $place2->active = 1;
        $place2->save();

    }
}
