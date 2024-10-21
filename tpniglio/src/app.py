from flask import Flask, render_template
import os
import database as db


template_dir = os.path.dirname(os.path.abspath (os.path.dirname(__file__)))
template_dir = os.path.join(template_dir,'src','templates')
app = Flask(__name__,template_folder = template_dir)

#indicaremos rutas de la aplicacion 
@app.route('/')
def home():
    return render_template ('index.html')



if __name__== '__main__':
    app.run(debug=True,port=4000)