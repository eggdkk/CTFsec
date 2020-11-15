
from flask import Flask,request,render_template
from jinja2 import Template
import os

app = Flask(__name__)
f = open('/flag','r')
flag = f.read()
@app.route('/',methods=['GET','POST'])
def home():
    name = request.args.get("name") or ""
    print(name)
    if name:
        return render_template('index.html',name=name)
    else:
        return render_template('index.html')

@app.route('/help',methods=['GET'])
def help():
    help = '''
    ZnJvbSBmbGFzayBpbXBvcnQgRmxhc2sscmVxdWVzdCxyZW5kZXJfdGVtcGxhdGUKZnJvbSBqaW5qYTIgaW1wb3J0IFRlbXBsYXRlCmltcG9ydCBvcwoKYXBwID0gRmxhc2soX19uYW1lX18pCgpmID0gb3BlbignL2ZsYWcnLCdyJykKZmxhZyA9IGYucmVhZCgpCkBhcHAucm91dGUoJy8nLG1ldGhvZHM9WydHRVQnLCdQT1NUJ10pCmRlZiBob21lKCk6CiAgICBuYW1lID0gcmVxdWVzdC5hcmdzLmdldCgibmFtZSIpIG9yICIiCiAgICBwcmludChuYW1lKQogICAgaWYgbmFtZToKICAgICAgICByZXR1cm4gcmVuZGVyX3RlbXBsYXRlKCdpbmRleC5odG1sJyxuYW1lPW5hbWUpCiAgICBlbHNlOgogICAgICAgIHJldHVybiByZW5kZXJfdGVtcGxhdGUoJ2luZGV4Lmh0bWwnKQoKQGFwcC5yb3V0ZSgnL2hlbHAnLG1ldGhvZHM9WydHRVQnXSkKZGVmIGhlbHAoKToKICAgIGhlbHAgPSAnJycKICAgICcnJwogICAgICAgIHJldHVybiBmLnJlYWQoKQoKQGFwcC5lcnJvcmhhbmRsZXIoNDA0KQpkZWYgcGFnZV9ub3RfZm91bmQoZSk6CiAgICAjTm8gd2F5IHRvIGdldCBmbGFnIQogICAgb3Muc3lzdGVtKCdybSAtZiAvZmxhZycpCiAgICB1cmwgPSBuYW1lID0gcmVxdWVzdC5hcmdzLmdldCgibmFtZSIpIG9yICIiCiAgICAjIHIgPSByZXF1ZXN0LnBhdGgKICAgIHIgPSByZXF1ZXN0LmRhdGEuZGVjb2RlKCd1dGY4JykKICAgIGlmICdldmFsJyBpbiByIG9yICdwb3BlbicgaW4gciBvciAne3snIGluIHI6CiAgICAgICAgdCA9IFRlbXBsYXRlKCIgTm90IGZvdW5kISIpCiAgICAgICAgcmV0dXJuIHJlbmRlcl90ZW1wbGF0ZSh0KSwgNDA0CiAgICB0ID0gVGVtcGxhdGUociArICIgTm90IGZvdW5kISIpCiAgICByZXR1cm4gcmVuZGVyX3RlbXBsYXRlKHQpLCA0MDQKCgppZiBfX25hbWVfXyA9PSAnX19tYWluX18nOgogICAgYXBwLnJ1bihob3N0PScwLjAuMC4wJyxwb3J0PTg4ODgp
    '''
    return help

@app.errorhandler(404)
def page_not_found(e):
    #No way to get flag!
    os.system('rm -f /flag')
    url = name = request.args.get("name") or ""
    # r = request.path
    r = request.data.decode('utf8')
    if 'eval' in r or 'popen' in r or '{{' in r:
        t = Template(" Not found!")
        return render_template(t), 404
    t = Template(r + " Not found!")
    return render_template(t), 404


if __name__ == '__main__':
    app.run(host='0.0.0.0',port=8888)