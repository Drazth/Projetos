<?php
defined('CONTROL') or die('Acesso negado');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = [
        //player 1
        'player_1_name' => $_POST['text_player_1'],
        'player_1_symbol' => 'X',
        'player_1_score' => 0,
        //player 2
        'player_2_name' => $_POST['text_player_2'],
        'player_2_symbol' => 'O',
        'player_2_score' => 0,

        'game_board' => [
            ['','',''],
            ['','',''],
            ['','',''],
        ],

        'game_turn' => 1,
        'game_number' => 1,
        'active_player' => 1,
    ];

    $_SESSION = $data;

    header('location:index.php?rota=game');
}
?>

<div class="conteiner mt-5">
    <div class="row justify-content-center">
        <div class="col-6 card bg-secondary text-white p-5">
            <form action="index.php?rota=start" method="post">
                <h3 class="text-center">Jogo da Velha</h3>
                <hr>
                <!--player 1 -->
                <div class="mb-3">
                    <label for="text_player_1" class="form-label">JOGADOR 1</label>
                    <input type="text" name="text_player_1" id="text_player_1" class="form-control" required>
                </div>

                <!--player 2 -->
                <div class="mb-3">
                    <label for="text_player_2" class="form-label">JOGADOR 2</label>
                    <input type="text" name="text_player_2" id="text_player_2" class="form-control" required>
                </div>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-dark w-5">INICIAR JOGO</button>
                </div>
            </form>
        </div>
    </div>
</div>