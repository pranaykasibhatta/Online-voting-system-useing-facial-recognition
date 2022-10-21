#! C:\Users\pranay kasibhatta\AppData\Local\Programs\Python\Python38\python.exe
import cgi
from base64 import b64decode
import face_recognition
print("Content-Type: text/html")
formData = cgi.FieldStorage()
face_match=0
image=formData.getvalue("current_image")
email=formData.getvalue("email")
data_uri = image
header, encoded = data_uri.split(",", 1)
data = b64decode(encoded)

with open("saved/"+email+".jpg", "wb") as f:
    f.write(data)

got_image = face_recognition.load_image_file("saved/"+email+".jpg")

existing_image = face_recognition.load_image_file("saved/"+email+".jpg")

got_image_facialfeatures = face_recognition.face_encodings(got_image)[0]
existing_image_facialfeatures = face_recognition.face_encodings(existing_image)[0]
results= face_recognition.compare_faces([existing_image_facialfeatures],got_image_facialfeatures)

if(results[0]):
    face_match=1
else:
    face_match=0
print()
if(face_match==1):
    print("<script>window.location.replace('http://localhost/votingsystem/otp_send.php');</script>")

