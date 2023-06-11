import csv
import json
from urllib import request, error
import time

"""Funcion que obtiene el país del IP"""
def ipInfo(nombre="", addr=""):
    try: 
        """Se utiliza una API gratuita. Se envia un parámetro para que se 
        obtenga solo el country del IP"""
        url = "http://ip-api.com/json/" + addr + "?fields=country"
        response = request.urlopen(url)
        data = json.load(response)
        """ Se utilza el time.sleep, ya que, al ser una API gratuita, solo 
        se permite hacer 45 request por minuto, sino levanta error"""
        time.sleep(1.5)
        linea = [nombre, str(addr), data['country']]
        print(linea)
        Mydata.append(linea)
    except error.HTTPError as e:
        if e == 429:
            time.sleep(int(response.headers["Retry-After"]))

"""Se arma el array con el encabezado del nuevo csv"""
Mydata = []
Mydata.append(['Nombre', 'GDPR IP', 'País'])

"""Se lee el listado de participantes"""
with open('Listado_participantes.csv') as File:
    reader = csv.reader(File, delimiter=';')
    header = next(reader)
    for row in reader:
        ipInfo(row[0], row[1])

"""Se escribe el nuevo archivo de las IPs junto con los países"""
myFile = open('Listado_Ip_Pais.csv', 'w', newline='')
with myFile:
    writer = csv.writer(myFile, delimiter=';')
    writer.writerows(Mydata)

print("Listo. Se ha creado un nuevo archivo CSV")