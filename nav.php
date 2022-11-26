<?php
    function render_navigation($active) {
        return  '<aside>'.
                    '<h2>Ações:</h2>'.
                    '<nav>'.
                        '<ul>'.
                            '<li class="'.($active == 'index' ? 'selected' : '').'">'.
                                '<a href="index.php">Itens Cadastrados</a>'.
                            '</li>'.
                            '<li class="'.($active == 'cadastro' ? 'selected' : '').'">'.
                                '<a href="cadastro.php">Novo Item</a>'.
                            '</li>'.
                            '<li class="'.($active == 'emprestimo' ? 'selected' : '').'">'.
                                '<a href="emprestimo.php">Novo Empréstimo</a>'.
                            '</li>'.
                            '<li class="'.($active == 'logout' ? 'selected' : '').'">'.
                                '<a href="logout.php">Sair</a>'.
                            '</li>'.
                        '</ul>'.
                    '</nav>'.
                '</aside>';
    }
?>
