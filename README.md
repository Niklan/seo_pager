# SEO Pager

**What this module does, I think is a hack. Especially for the page offset. It only exist because some clients want these changes.**

What does this module do:

- Correct page numbers in query:
    - Default: Page 2 = ?page=1
    - Fixed: Page 2 = ?page=2
- Fixed core pager Url generation which respects Outbound path processors.
- Removed query arguments from pager links which is not part of url. This means, Views exposed filters and sorts will not present in pager links, if they remain to default values. If sort or filters was selected, they will be there.
- Added Views Display Extender plugin, allows you to enable `rel="prev"` and `rel="next"` meta-tags.


## Install

- Download and install as usual.
- If you want use Views plugin:
    - Structure - Views - Settings - Advanced
    - Enable SEO pager display extender.


## WARNING

- Not tested with AJAX.
- Not tested with multiple pagers on the same page.
