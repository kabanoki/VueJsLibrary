<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <style>
    #app {
      margin-top: 50px;
    }
  </style>
</head>
<body>
<div id="app">
  <div class="container">
    <form method="post" action>
      <textarea class="form-control" rows="10" name="text" v-model="text"></textarea>
      <button>送信</button>
    </form>
    <hr>
    <pre>{{text}}</pre>
  </div>
</div>


<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- bootstrap end -->
<!-- Vue 3.2.26 -->
<script src="https://unpkg.com/vue@3.2.26/dist/vue.global.js"></script>
<!-- Vue 3.2.26 end -->

<script>
const text = `<?php echo $_POST['text'] ?? '' ?>`;  
const App = {
  data() {
    return {
      text :text
    }
  },
}

Vue.createApp(App).mount('#app');
 </script>
</body>
</html>
