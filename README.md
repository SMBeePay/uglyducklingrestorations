# Ugly Duckling Restorations

Marketing website for Ugly Duckling Restorations — furniture restoration.

## Status

Placeholder only. Real build hasn't started yet — waiting on the brand/logo kit
and real project photos before building out the site (stock images will fill in
for photos in the meantime).

## Planned hosting

Hostinger shared hosting, connected via hPanel's Git integration (same setup
used for talleysiteservices.com):

1. Push commits to this repo on GitHub.
2. hPanel → Websites → select site → Advanced → Git → connect this repo,
   branch `main`, directory `public_html`.
3. Click Deploy in hPanel after pushing (or enable auto-deploy).
4. Point uglyducklingrestorations.com at the Hostinger website in hPanel → Domains.

## Branches

Development happens on `claude/ugly-duckling-restorations-site-9854sl`. Merge
into `main` when ready to go live, and point Hostinger's Git deployment at `main`.
