import requests
import Adafruit_DHT
import datetime
import time

S_NO = "" #Sensor_No. of the Device

sensor = 11
pin = 4

URL = "https://temphumiditystation.000webhostapp.com/set_data.php"

while True:
	cur_time = datetime.datetime.now()
	h, t = Adafruit_DHT.read_retry(sensor, pin)

	day = cur_time.day
	month = cur_time.month
	year = cur_time.year
	hour = cur_time.hour
	min = cur_time.minute
	sec = cur_time.second

	date = "{y}-{m}-{d}".format(y=year, m=month, d=day)
	time1 = "{h}:{m}:{s}".format(h=hour, m=min, s=sec)

	params = {"S_NO": S_NO, "DATE": date, "TIME": time1, "TEMPERATURE": t, "HUMIDITY": h}
	r = requests.get(URL, params=params)

	print(r.text)
	time.sleep(10)