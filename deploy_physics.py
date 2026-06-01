import os
import re
import ftplib

WORKSPACE = r"c:\Users\israe\Desktop\Cripto\Physics Academy"

def load_env():
    env_path = os.path.join(WORKSPACE, ".env")
    if os.path.exists(env_path):
        with open(env_path, 'r', encoding='utf-8') as f:
            for line in f:
                line = line.strip()
                if not line or line.startswith('#'):
                    continue
                parts = line.split('=', 1)
                if len(parts) == 2:
                    k, v = parts[0].strip(), parts[1].strip()
                    if (v.startswith('"') and v.endswith('"')) or (v.startswith("'") and v.endswith("'")):
                        v = v[1:-1]
                    os.environ[k] = v

load_env()


def secure_and_convert_files():
    print("Securing and converting PHP files...")
    for root, dirs, files in os.walk(WORKSPACE):
        # Calculate relative path
        rel_dir = os.path.relpath(root, WORKSPACE)
        
        for file in files:
            # We process all PHP files
            if file.endswith('.php'):
                file_path = os.path.join(root, file)
                
                # Skip index.php, db_config.php and auth.php from auth prepending
                if file in ['index.php', 'db_config.php', 'auth.php']:
                    continue
                
                with open(file_path, 'r', encoding='utf-8') as f:
                    content = f.read()
                
                # Check if already secured
                has_auth = "auth.php" in content
                
                new_content = content
                # Ensure links are correct (.html -> .php)
                new_content = re.sub(r'(href=["\'])([^"\']+\.html)(["\'])', lambda m: m.group(1) + m.group(2)[:-5] + '.php' + m.group(3), new_content)
                new_content = re.sub(r'(window\.location\.href\s*=\s*["\'])([^"\']+\.html)(["\'])', lambda m: m.group(1) + m.group(2)[:-5] + '.php' + m.group(3), new_content)
                new_content = re.sub(r'(runBootSequence\(["\'])([^"\']+\.html)(["\'])', lambda m: m.group(1) + m.group(2)[:-5] + '.php' + m.group(3), new_content)
                new_content = re.sub(r'(action=["\'])([^"\']+\.html)(["\'])', lambda m: m.group(1) + m.group(2)[:-5] + '.php' + m.group(3), new_content)
                
                # Prepend auth check if missing
                if not has_auth:
                    print(f"Securing: {file_path}")
                    if rel_dir == '.':
                        new_content = "<?php require_once 'auth.php'; ?>\n" + new_content
                    else:
                        new_content = "<?php require_once '../auth.php'; ?>\n" + new_content
                
                with open(file_path, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                    
    print("Security injection complete!")

def upload_via_ftp():
    print("Connecting to FTP...")
    ftp_host = os.getenv('FTP_HOST', 'ftpupload.net')
    ftp_user = os.getenv('FTP_USER', 'if0_42066037')
    ftp_pass = os.getenv('FTP_PASS', 'PaladinDuerme')
    ftp = ftplib.FTP(ftp_host)
    ftp.login(ftp_user, ftp_pass)
    print("Logged in. Navigating to htdocs...")
    ftp.cwd('htdocs')
    
    # Exclude list
    exclude_dirs = {'.git', '__pycache__', '.gemini'}
    exclude_files = {'.gitignore', 'move_homework_slides.py', 'apply_presentation_theme.py', 'deploy_physics.py'}
    
    def ftp_mkdir_p(path):
        parts = path.split('/')
        current = ""
        for part in parts:
            if not part:
                continue
            current = f"{current}/{part}" if current else part
            try:
                ftp.mkd(current)
                print(f"Created remote directory: {current}")
            except ftplib.error_perm as e:
                pass

    print("Uploading files recursively...")
    for root, dirs, files in os.walk(WORKSPACE):
        dirs[:] = [d for d in dirs if d not in exclude_dirs]
        
        rel_path = os.path.relpath(root, WORKSPACE).replace('\\', '/')
        if rel_path == '.':
            rel_path = ''
            
        if rel_path:
            ftp_mkdir_p(rel_path)
            
        for file in files:
            if file in exclude_files or file.endswith('.py'):
                continue
                
            local_file_path = os.path.join(root, file)
            remote_file_path = f"{rel_path}/{file}" if rel_path else file
            
            print(f"Uploading: {local_file_path} -> {remote_file_path}")
            
            with open(local_file_path, 'rb') as f:
                ftp.storbinary(f"STOR {remote_file_path}", f)
                
    ftp.quit()
    print("Deployment completed successfully!")

if __name__ == '__main__':
    secure_and_convert_files()
    upload_via_ftp()
