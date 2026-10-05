import re

def fix_contact():
    f = 'e:/iqragrup/resources/views/welcome/pages/contact.blade.php'
    with open(f, 'r', encoding='utf-8') as file:
        c = file.read()
    
    # Remove the bad hidden input at the end
    c = c.replace('<input type="hidden" name="subject" value="Contact Us Page">\n@endsection', '@endsection')
    
    # Add it inside the form
    c = c.replace('<button class="contact-submit-btn" type="submit">Send</button>', '<input type="hidden" name="subject" value="Contact Us Page">\n<button class="contact-submit-btn" type="submit">Send</button>')
    
    with open(f, 'w', encoding='utf-8') as file:
        file.write(c)
    print("Fixed contact.blade.php")

fix_contact()
