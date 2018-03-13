## Technical

I wanted this page to be _fast_, _reliable_ and _accessible_. This is what I did.


### Server
The server is a Digital Ocean _debian_ droplet and the site is served via _nginx_.



### Static pages
All pages are generated static _HTML pages_. The content is written in _[Markdown](https://daringfireball.net/projects/markdown/)_ and converted to HTML before being synced to the server.



### Typography
I came across the [faune](http://www.cnap.graphismeenfrance.fr/faune/en.html) font and liked the different look. The fonts are hosted on the server and served & cached through _nginx_.



### Accesibility
Links in text are underlined and in default color. Active links have their default color.

Added this little snippet to highlight for myself if alternative text is not provided in images.

<pre><code>
img[alt=""],
img:not([alt]) {
    border: 5px dashed red;
}
</code></pre>
