<?php

use Illuminate\Database\Seeder;

class AuxiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('turmas')->insert([
            ['codigo' => '01', 'turma' => 'RECEPCAO', 'descricao' => 'Recebe o amigo, da as boas vindas, colhe os dados principais, cadastra e direciona'],
            ['codigo' => '02', 'turma' => 'ESCOLA SABATINA', 'descricao' => 'Cuida, se relaciona, acompanha e discipula'],
            ['codigo' => '03', 'turma' => 'PEQUENOS GRUPOS', 'descricao' => 'Reuniões e ações atraentes'],
            ['codigo' => '04', 'turma' => 'MINISTERIO PESSOAL', 'descricao' => 'Fomenta o circuito, oração, visitação e estudo']
        ]);

        DB::table('perfils')->insert([
            ['codigo' => '01', 'perfil' => 'NÃO ADVENTISTA (SOZINHO)', 'descricao' => 'teste'],
            ['codigo' => '02', 'perfil' => 'NÃO ADVENTISTA (ACOMPANHADO)', 'descricao' => 'teste'],
            ['codigo' => '03', 'perfil' => 'ADVENTISTA (VISITANTE)', 'descricao' => 'teste'],
            ['codigo' => '04', 'perfil' => 'ADVENTISTA (DA CASA)', 'descricao' => 'teste']
        ]);

       DB::table('status')->insert([

            ['codigo' => '01', 'status' => 'CADASTRADO', 'descricao' => 'Amigo cadastrado pela recepção ou pelo PG)'],
            ['codigo' => '02', 'status' => 'AGUARDANDO ENCAMINHAMENTO', 'descricao' => 'Amigo aguardando encaminhamento'],
            ['codigo' => '03', 'status' => 'BATISMO', 'descricao' => 'Amigo fazendo estudo bíblico'],
            
            ['codigo' => '04', 'status' => 'ENCAMINHADO', 'descricao' => 'Amigo encaminhado para o ciclo certo de tratamento'],
            ['codigo' => '05', 'status' => 'ESTUDANDO', 'descricao' => 'Amigo fazendo estudo bíblico'],

            ['codigo' => '06', 'status' => 'FINALIZADO', 'descricao' => 'Amigo cumpriu todoo o ciclo necessário (enviado para banco de oração)'],

            ['codigo' => '07', 'status' => 'REABERTO', 'descricao' => 'Amigo voltando para algum ciclo específico'],
            ['codigo' => '08', 'status' => 'TREINAMENTO', 'descricao' => 'Amigo em treinamento']
            
         ]);
        

        DB::table('bairros')->insert([
            ['nome' => 'ALFAMA'],
            ['nome' => 'ARROZAL'],
            ['nome' => 'BASEVI'],
            ['nome' => 'FERCAL'],
            ['nome' => 'NOVA COLINA'],
            ['nome' => 'NOVA COLINA'],
            ['nome' => 'SOBRADINHO II'],
            ['nome' => 'SOL NASCENTE'],
            ['nome' => 'VILA DENOCS'],
        ]);


    }
}
