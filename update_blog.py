import re

def update_blog():
    f = 'e:/iqragrup/resources/views/welcome/blogs/blogView.blade.php'
    with open(f, 'r', encoding='utf-8') as file:
        c = file.read()
    
    # We want to replace from <div class="news-details-date"> to </div> </div> </div> </div> </main>
    # Find start
    p1 = c.find('<div class="news-details-date">')
    
    # Find end
    p2_start = c.find('<div class="news-details-nav">')
    p2 = c.find('</div>', p2_start)
    p2 = c.find('</div>', p2 + 6) + 6 # include the closing of news-details-nav

    if p1 != -1 and p2 != -1:
        new_content = c[:p1] + """<div class="news-details-date">{{ \\Carbon\\Carbon::parse($post->created_at)->format('d M') }}</div>
<h1 class="news-details-title" data-aos="fade-down">
    {{$post->title}}
</h1>
<div class="news-details-content">
    {!! $post->description !!}
</div>
<div class="news-details-nav">
<!-- Nav placeholder -->
</div>""" + c[p2:]
        with open(f, 'w', encoding='utf-8') as file:
            file.write(new_content)
        print("blogView updated.")
    else:
        print("blogView markers not found")

update_blog()
