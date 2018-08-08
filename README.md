# SEO Pager

**What this module do, I think is hack. Especially for page offset. But it exist because some clients want this changes.**

What does this module do:

- Correct page numbers in query:
    - Default: Page 2 = ?page=1
    - Fixed: Page 2 = ?page=2
- Fixed core pager Url generation which respects Outbound path processors.
- Removed query arguments from pager links which is not part of url. This means, Views exposed filters and sorts will not present in pager links, if the remain to default values. If the was selected, the will be there.
- Added Views Display Extender plugin, allows you to enable `rel="prev"` and `rel="next"` meta-tags.


## Install

- Download and install as usual.
- If you want use Views plugin:
    - Structure - Views - Settings - Advanced
    - Enable SEO pager display extender.


## WARNING

- Not tested with AJAX.
- Not tested with multiple pagers on the same page.
