            max-width: 900px;
            margin: 0 auto;
            padding: 28px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, .08);
        }

        h1 {
            margin: 0 0 8px;
            text-align: center;
            color: #263b5e;
        }

        .subtitulo {
            margin: 0 0 24px;
            text-align: center;
            color: #667085;
        }

        .tabela-responsiva { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #263b5e;
            color: #fff;
        }

        tbody tr:nth-child(even) { background: #f8fafc; }
        tbody tr:hover { background: #eef3fa; }

        .mensagem {
            padding: 18px;
            text-align: center;
            background: #f8fafc;
            border-radius: 8px;
        }

        .acoes {
            margin-top: 24px;
            text-align: center;
        }

        .botao {
            display: inline-block;
            padding: 11px 20px;
            color: #fff;
            background: #263b5e;
            border-radius: 6px;
            text-decoration: none;
        }

        .botao:hover { background: #1b2b46; }

        @media (max-width: 600px) {
            .container { padding: 20px 14px; }
            th, td { padding: 11px 10px; }
        }
    </style>
</head>
<body>
    <main class="container">
        <h1>Alunos cadastrados</h1>
        <p class="subtitulo">Registros encontrados no banco de dados</p>

        <?php if ($resultado->num_rows > 0): ?>
            <div class="tabela-responsiva">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($linha = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $linha['id'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($linha['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($linha['cpf'], ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="mensagem">Nenhum aluno cadastrado no banco de dados.</p>
        <?php endif; ?>

        <div class="acoes">
            <a class="botao" href="index.php">Voltar ao login</a>
        </div>
    </main>
</body>
</html>
<?php
$resultado->free();
$conexao->close();
?>