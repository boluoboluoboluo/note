### ��׿΢��h5֧��refer��ʧ����

�������ַ�ʽ android WebView �в��ᶪʧreferer��

```js
//��ʽһ�� js�ύ��
<script>
    document.form.method= "post";     
    document.form.action= "https://wx.tenpay.com/cgi-bin/mmpayweb-bin/checkmweb?֧����Ϣ ";
    document.form.submit(); 
</script>
```

```js
//��ʽ���� jquery��̬������
var action='https://wx.tenpay.com/cgi-bin/mmpayweb-bin/checkmweb?֧����Ϣ ' 
    var form = $("<form></form>")
    form.attr('action', action)
    form.attr('method', 'post')
    //׷�ӵ�body������ʾ��Ȼ���ύ
    form.appendTo("body")
    form.css('display', 'none')
    form.submit()
```

