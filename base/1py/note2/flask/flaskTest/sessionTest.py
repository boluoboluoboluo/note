from flask import render_template
from flask import make_response
from flask import Flask, session, redirect, url_for, escape, request

app = Flask(__name__)

#session的随机secret_key
app.secret_key = 'fkdjsafjdkfdlkjfadskjfadskljdsfklj'

@app.route('/')
def index():
    if 'username' in session:
        username = session['username']
        return '登录用户名是:' + username + '<br>' + \
                 "<b><a href = '/logout'>点击这里注销</a></b>"
    return "您暂未登录， <br><a href = '/login'></b>" + \
         "点击这里登录</b></a>"

@app.route('/login', methods = ['GET', 'POST'])
def login():
    if request.method == 'POST':
        session['username'] = request.form['username']	#设置session
        return redirect(url_for('index'))
    
    return '''
   <form action = "" method = "post">
      <p><input type="text" name="username"/></p>
      <p><input type="submit" value ="登录"/></p>
   </form>
   '''

@app.route('/logout')
def logout():
   # remove the username from the session if it is there
   session.pop('username', None)	#清除
   return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug = True)