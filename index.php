<?php
// Importar as classes
require_once "classes/Cliente.php";
require_once "classes/Produto.php";
require_once "classes/Pedido.php";

// Criar 1 cliente
$cliente = new Cliente(1, "João Silva", "joao@email.com");

// Criar 3 produtos
$produto1 = new Produto(1, "Notebook", 3500.00);
$produto2 = new Produto(2, "Mouse Gamer", 150.00);
$produto3 = new Produto(3, "Headset", 280.00);

// Criar 1 pedido
$pedido = new Pedido(1001, $cliente);

// Adicionar produtos ao pedido
$pedido->adicionarProduto($produto1);
$pedido->adicionarProduto($produto2);
$pedido->adicionarProduto($produto3);

// Preparar dados para exibição
$numeroPedido = $pedido->getNumero();
$nomeCliente = $pedido->getCliente()->getNome();
$emailCliente = $pedido->getCliente()->getEmail();
$produtos = $pedido->getProdutos();
$totalPedido = $pedido->calcularTotal();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos da Loja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🛒 Sistema de Pedidos da Loja</h1>
        </header>

        <main>
            <!-- Informações do Pedido -->
            <section class="pedido-info">
                <h2>Pedido Nº <?php echo $numeroPedido; ?></h2>
            </section>

            <!-- Informações do Cliente -->
            <section class="cliente-info">
                <h3>Cliente</h3>
                <p>
                    <strong>Nome:</strong> <?php echo $nomeCliente; ?>
                </p>
                <p>
                    <strong>Email:</strong> <?php echo $emailCliente; ?>
                </p>
            </section>

            <!-- Lista de Produtos -->
            <section class="produtos-lista">
                <h3>Produtos</h3>
                <table class="tabela-produtos">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo $produto->getNome(); ?></td>
                                <td>R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

            <!-- Total do Pedido -->
            <section class="total-pedido">
                <h3>Total do Pedido</h3>
                <p class="valor-total">R$ <?php echo number_format($totalPedido, 2, ',', '.'); ?></p>
            </section>
        </main>

        <footer>
            <p>&copy; 2026 Sistema de Pedidos - Todos os direitos reservados</p>
        </footer>
    </div>
</body>
</html>
