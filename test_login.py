import urllib.request
import urllib.parse

url = 'https://fisicaacademy.free.je/index.php'
data = urllib.parse.urlencode({
    'username': 'ESTUDIANTE',
    'password': 'fisica2026'
}).encode('utf-8')

req = urllib.request.Request(url, data=data, headers={
    'Content-Type': 'application/x-www-form-urlencoded'
})

try:
    r = urllib.request.urlopen(req, timeout=15)
    body = r.read().decode('utf-8', errors='replace')
    print("STATUS:", r.status)
    # Look for error messages or success indicators
    if 'Error de conexión' in body:
        print(">>> DB CONNECTION ERROR DETECTED")
    if 'ACCESO DENEGADO' in body:
        print(">>> ACCESS DENIED - Wrong credentials")
    if 'CUENTA DESACTIVADA' in body:
        print(">>> ACCOUNT DISABLED")
    if 'runBootSequence' in body:
        print(">>> LOGIN SUCCESS - Boot sequence triggered")
    if 'error-msg visible' in body or "error-msg  visible" in body:
        print(">>> ERROR MSG IS VISIBLE")
    
    # Print the relevant section around error
    idx = body.find('error-msg')
    if idx > -1:
        print("ERROR SECTION:", body[idx:idx+200])
    
    # Print first 2000 chars
    print("\n--- BODY (first 2000) ---")
    print(body[:2000])
except Exception as e:
    print(f"REQUEST FAILED: {e}")
