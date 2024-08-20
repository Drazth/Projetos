<?php
defined('CONTROL') or die('Acesso negado');

if(isset($_GET['next'])){
    $_SESSION['game_number']++;
    $_SESSION['game_board']= [
        ['','',''],
        ['','',''],
        ['','',''],
    ];

    $_SESSION['game_turn'] = 1;

    $_SESSION['active_player'] = $_SESSION['active_player'] == 1 ? 2 : 1;

    header('Location: index.php?rota=game');
}

if(isset($_GET['player']) && isset($_GET['x']) && isset($_GET['y'])) {

    $player = $_GET['player'];
    $x = $_GET['x'];
    $y = $_GET['y'];
    $winner = null;

    if(empty($_SESSION['game_board'][$x][$y])) {

        $_SESSION['game_board'][$x][$y] = $player == 1 ? 'X': 'O';
        $status = check_game_status($player);
        
        if(!empty($status)){
            $winner = $player == 1 ? $_SESSION['player_1_name'] : $_SESSION['player_2_name'];
            $_SESSION[$player == 1 ? 'player_1_score' : 'player_2_score']++;
            
        }

        if($_SESSION['game_turn'] == 9 && empty($winner)){
            $winner = 'Empate';
            
        }
        if(empty($winner)){
            $_SESSION['active_player'] = $player == 1 ? 2 : 1;
            $_SESSION['game_turn']++;
        } 
    }
}


function check_game_status($player){

    $mark = $player == 1 ? 'X' : 'O';
    $game_board = $_SESSION['game_board'];
    $status = null;

    if($game_board[0][0] == $mark && $game_board[0][1] == $mark && $game_board[0][2] == $mark){
        $status = 'win1';
    }
    if($game_board[1][0] == $mark && $game_board[1][1] == $mark && $game_board[1][2] == $mark){
        $status = 'win2';
    }
    if($game_board[2][0] == $mark && $game_board[2][1] == $mark && $game_board[2][2] == $mark){
        $status = 'win3';
    }
    if($game_board[0][0] == $mark && $game_board[1][0] == $mark && $game_board[2][0] == $mark){
        $status = 'win4';
    }
    if($game_board[0][1] == $mark && $game_board[1][1] == $mark && $game_board[2][1] == $mark){
        $status = 'win5';
    }
    if($game_board[0][2] == $mark && $game_board[1][2] == $mark && $game_board[2][2] == $mark){
        $status = 'win6';
    }
    if($game_board[0][0] == $mark && $game_board[1][1] == $mark && $game_board[2][2] == $mark){
        $status = 'win7';
    }
    if($game_board[2][0] == $mark && $game_board[1][1] == $mark && $game_board[0][2] == $mark){
        $status = 'win8';
    }

    return $status;

}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <h3 class="text-center">Jogo da Velha</h3>
            <hr>
            <div class="row">
                <div class="col">
                    <h3 class="text-center <?= $_SESSION['active_player'] == 1 ? 'text-warning' : '' ?>"><?= $_SESSION['player_1_name'] ?></h3>
                    <h3 class="text-center"><?= $_SESSION['player_1_score'] ?></h3>
                </div>
                <div class="col">
                    <h3 class="text-center">
                        <span class="text-info">JOGO <?= $_SESSION['game_number']?></span>
                    </h3>
                </div>
                <div class="col text-end">
                    <h3 class="text-center <?= $_SESSION['active_player'] == 2 ? 'text-warning' : '' ?>"><?= $_SESSION['player_2_name'] ?></h3>
                    <h3 class="text-center"><?= $_SESSION['player_2_score'] ?></h3>
                </div>
                <hr>
                <?php for ($row = 0; $row <= 2; $row++) : ?>

                    <div class="d-flex justify-content-center">

                        <?php for ($col = 0; $col <= 2; $col++) : ?>
                            
                            <a href="index.php?rota=game&player=<?= $_SESSION['active_player'] ?>&x=<?= $row ?>&y=<?= $col ?>">
                                <div class="board-cell text-center">
                                    <?php if ($_SESSION['game_board'][$row][$col] == 'X') : ?>
                                        <img src="assets/images/cruz.png">
                                    <?php elseif ($_SESSION['game_board'][$row][$col] == 'O') : ?>
                                        <img src="assets/images/circulo.png">
                                    <?php endif;?>
                                    
                                </div>
                            </a>

                        <?php endfor; ?>
                    </div>
                <?php endfor; ?>

                <?php if(!empty($winner)) : ?>
                    <div class="text-center mt-5">
                        <h3 class="text-center text-warning"><?= $winner?></h3>
                        <div class="text-center mt-5">
                            <a href="index.php?rota=game&next=1" class="btn btn-success w-25">PROXIMO JOGO</a>
                        </div>
                    </div>
                <?php endif;?>

                <div class="text-center mt-5">
                    <a href="index.php?rota=start" class="btn btn-dark w-25">REINICIAR</a>
                </div>
            </div>
        </div>
    </div>
</div>