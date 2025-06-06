<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Drink</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Georgia', serif;
    }
    body, html {
      height: 100%;
    }
    .container {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-color: #000;
      color: white;
    }
    .image-side {
      flex: 1.2;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background: #000;
    }
    .image-side img {
      width: 100%;
      height: 100vh;
      object-fit: cover;
      border-radius: 0;
      box-shadow: none;
      border: none;
      background: none;
      display: block;
    }
    .form-wrapper {
      flex: 1;
      position: relative;
      left: -120px; /* Mude este valor para mover a caixa para a esquerda/direita */
      /* Você pode usar também margin-left ou right, se preferir */
      z-index: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      background-color: rgba(0, 0, 0, 0.85);
      padding: 60px 40px;
      border-radius: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 400px;
      max-width: 500px;
      box-shadow: 0 0 30px #000a;
    }
    .form-box h1 {
      font-size: 32px;
      margin-bottom: 30px;
      text-align: center;
      line-height: 1.4;
    }
    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      gap: 18px;
      align-items: center; /* Centraliza tudo */
    }
    input[type="text"] {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 25px;
      font-size: 16px;
      outline: none;
      background: white;
      color: black;
    }
    .upload-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: white;
      color: black;
      border-radius: 25px;
      padding: 10px 20px;
      cursor: pointer;
      width: 100%;
      justify-content: center;
    }
    .upload-btn img {
      width: 24px;
      height: 24px;
    }
    button, input[type="submit"] {
      margin-top: 10px;
      padding: 12px 20px;
      border: none;
      border-radius: 25px;
      background-color: white;
      color: black;
      font-weight: bold;
      cursor: pointer;
      width: 100%;
      align-self: center;
    }
    a {
      color: #fff;
      text-decoration: underline;
      margin-top: 15px;
      display: inline-block;
    }
    @media (max-width: 900px) {
      .container {
        flex-direction: column;
      }
      .image-side img {
        width: 100vw;
        height: 40vh;
        border-radius: 0;
      }
      .form-wrapper {
        left: 0;
        height: auto;
      }
      .form-box {
        border-radius: 0 0 30px 30px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="image-side">
      <img src="/SubZero/IMAGES/pag_cadastro.jpg" alt="MOJITO">
    </div>
    <div class="form-wrapper">
      <div class="form-box">
        <h1>CADASTRAR<br>NOVA BEBIDA/DRINK</h1>
        <form action="/SubZero/public/save-bebida" method="POST" enctype="multipart/form-data">
          <input type="text" name="nome" placeholder="NOME DA BEBIDA" required>
          <input type="text" name="descricao" placeholder="DESCRIÇÃO" required>
          <input type="text" name="ingredientes" placeholder="INGREDIENTES" required>
          <input type="text" name="instrucoes" placeholder="INSTRUÇÕES" required>
          <input type="hidden" name="usuario_id" value="1">
          <button type="submit">CADASTRAR</button>
        </form>
        <a href="/SubZero/public/list-bebida">Ver todas as bebidas</a>
      </div>
    </div>
  </div>
</body>
</html>