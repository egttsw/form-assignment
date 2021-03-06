<!DOCTYPE html>
<html>
  <head>
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      * {
        box-sizing: border-box;
      }
      html, body {
        min-height: 100vh;
        padding: 0;
        margin: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px; 
        color: #666;
      }
      input, textarea { 
        outline: none;
        margin-top: 5px;
        margin-bottom: 5px;
      }
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        background: #5a7233;
      }
      h1 {
        margin-top: 0;
        font-weight: 500;
      }
      h4 {
        margin: 5px 0;
      }
      form {
        position: relative;
        width: 80%;
        border-radius: 30px;
        background: #fff;
      }
      .form-left-decoration,
      .form-right-decoration {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 20px;
        background: #5a7233;
      }
      .form-left-decoration {
        bottom: 60px;
        left: -30px;
      }
      .form-right-decoration {
        top: 60px;
        right: -30px;
      }
      .form-left-decoration:before,
      .form-left-decoration:after,
      .form-right-decoration:before,
      .form-right-decoration:after {
        content: "";
        position: absolute;
        width: 50px;
        height: 20px;
        border-radius: 30px;
        background: #fff;
      }
      .form-left-decoration:before {
        top: -20px;
      }
      .form-left-decoration:after {
        top: 20px;
        left: 10px;
      }
      .form-right-decoration:before {
        top: -20px;
        right: 0;
      }
      .form-right-decoration:after {
        top: 20px;
        right: 10px;
      }
      .circle {
        position: absolute;
        bottom: 80px;
        left: -55px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #fff;
      }
      .form-inner {
        0px;
      }
      .form-inner input,
      .form-inner textarea {
        display: block;
        width: 100%;
        padding: 15px;
        margin-bottom: 10px;
        border: none;
        border-radius: 20px;
        background: #d0dfe8;
      }
      .form-inner textarea {
        resize: none;
      }
      button {
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        border-radius: 20px;
        border: none;
        border-bottom: 4px solid #3e4f24;
        background: #5a7233; 
        font-size: 16px;
        font-weight: 400;
        color: #fff;
      }
      button:hover {
        background: #3e4f24;
      } 
      @media (min-width: 568px) {
      form {
        width: 60%;
      }
      }
    </style>
  </head>
  <body>
      <form action="/sent" class="decor" method="POST">
        @csrf
      <div class="form-left-decoration"></div>
      <div class="form-right-decoration"></div>
      <div class="circle"></div>
      <div class="form-inner">
        <h1>Laenu p??ring</h1>
        <h4>Ees- ja perekonnanimi</h4>
        <span style="color: red">
            @error('name'){{ $errors->first('name') }}@enderror
        </span>
        <input type="text" name="name" placeholder="Nimi"
        @if($errors->any() && !$errors->get('name'))
            value= "{{ old('name') }}"
        @endif>
        <h4>Isikukood</h4>
        <span style="color: red">
            @error('personal-id-code'){{ $errors->first('personal-id-code') }}@enderror
        </span>
        <input type="number"
            name="personal-id-code"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength="11"
        @if($errors->any() && !$errors->get('personal-id-code'))
            value= "{{ old('personal-id-code') }}"
        @endif
            placeholder="Isikukood">
        <h4>Laenu summa eurodes</h4>
        <span style="color: red">
            @error('loan-amount'){{ $errors->first('loan-amount') }}@enderror
        </span>
        <input type="number"
            name="loan-amount"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength="5"
        @if($errors->any() && !$errors->get('loan-amount'))
            value= "{{ old('loan-amount') }}"
        @endif
            placeholder="Laenu summa">
        <h4>Laenu periood kuudes</h4>
        <span style="color: red">
            @error('period'){{ $errors->first('period') }}@enderror
        </span>
        <input type="number"
            name="period"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength="2"
        @if($errors->any() && !$errors->get('period'))
            value= "{{ old('period') }}"
        @endif
            placeholder="Laenu periood">
        <h4>Kasutuseesm??rk</h4>
        <span style="color: red">
            @error('purpose'){{ $errors->first('purpose') }}@enderror
        </span>
        <textarea name="purpose" rows="5" maxlength="3500" placeholder="Kasutuseesm??rk">{{old('purpose')}}</textarea>
        <button type="submit">Edasi</button>
      </div>
    </form>
  </body>
</html>