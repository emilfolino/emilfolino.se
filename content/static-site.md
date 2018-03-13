## Static Site Generation
This site was created with three goals in mind _fast_, _reliable_ and _accessible_. I wanted the site to load in less than 200ms without caching. At my computer at BTH I get response times of ~150ms without caching and ~50ms with caching.

### So how did I do this?
Most of is down to using the native technologies of the web. Static HTML pages load extremely fast so that is what I use. The HTML pages are created from Markdown in a small compiler script that puts it all together before sending everything to the server.
