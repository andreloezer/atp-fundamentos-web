<?php
    function render_navigation($active) {
        return  '<aside>'.
                    '<nav>'.
                        '<h2>Ações:</h2>'.
                        '<ul>'.
                            '<li class="'.($active == 'index' ? 'selected' : '').'">'.
                                '<a href="index.php">Empréstimos</a>'.
                            '</li>'.
                            '<li class="'.($active == 'emprestimo' ? 'selected' : '').'">'.
                                '<a href="emprestimo.php">Emprestar</a>'.
                            '</li>'.
                            '<li class="'.($active == 'perfil' ? 'selected' : '').'">'.
                                '<a href="perfil.php">Meu Perfil</a>'.
                            '</li>'.
                            '<li class="'.($active == 'senha' ? 'selected' : '').'">'.
                                '<a href="senha.php">Alterar Senha</a>'.
                            '</li>'.
                            '<li class="'.($active == 'logout' ? 'selected' : '').'">'.
                                '<a href="logout.php">Sair</a>'.
                            '</li>'.
                        '</ul>'.
                    '</nav>'.
                '</aside>';
    }
?>
