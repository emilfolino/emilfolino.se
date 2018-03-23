## Technical

I wanted this page to be **fast**, **reliable** and **accessible**. This is what I did.


### Server
The server is a Digital Ocean debian droplet and the site is served via nginx.



### Static pages
All pages are generated static HTML pages. The content is written in [Markdown](https://daringfireball.net/projects/markdown/) and converted to HTML before being synced to the server.



### Typography
I came across the [faune](http://www.cnap.graphismeenfrance.fr/faune/en.html) font and liked the different look. The fonts are hosted on the server and served & cached through nginx.



### Accesibility
Links in text are underlined and in default color. Active links have their default color.

Added this little snippet to highlight for myself if alternative text is not provided in images.

<pre><code>
img[alt=""],
img:not([alt]) {
    border: 5px dashed red;
}
</code></pre>
