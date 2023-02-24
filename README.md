"# vue" 

~~~
// デフォルト以外のグローバル変数を取得
(() => {
  var iframe = document.createElement('iframe');
  iframe.style.display = 'none';
  document.body.appendChild(iframe);
  setTimeout(() => {
    var table = Object.keys(window)
            .filter((key) => {
              return typeof iframe.contentWindow[key] === 'undefined';
            })
            .reduce((obj, key) => {
              obj[key] = {value: window[key]};
              return obj;
            }, {});
    document.body.removeChild(iframe);
    console.table(table);
  }, 0);
})();
~~~