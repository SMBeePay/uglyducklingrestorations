# Ugly Duckling Restorations

Single-page marketing site for Ugly Duckling Restorations — solid wood furniture
restoration serving Royse City, TX and the surrounding 25 miles.

## Project structure

```
index.html              The entire site (hero, about, services, gallery, why-us,
                         service area, contact)
contact-handler.php      Server-side handler for the contact form (PHP mail())
css/style.css            All styling, brand tokens as CSS variables
js/main.js                Mobile nav toggle, footer year, contact form submit
images/brand/             Web-ready logo/icon files used by the site (see below)
images/about/, images/gallery/  Optimized stock photos used on the page (see Images)
brand-assets/             Original approved logo files, kept for reference/print,
                           not served on the live site
stock-photos/              Original full-res Unsplash downloads, not served on the
                           live site (optimized copies live in images/)
robots.txt, sitemap.xml
.htaccess                 Forces https, disables directory listing
```

**This site needs PHP only for the contact form.** The page itself is static
HTML/CSS/JS. Preview locally with `php -S localhost:8000` from the project root,
then visit `http://localhost:8000`.

## Deploying to Hostinger

Same process used for talleysiteservices.com:

1. Push commits to this repo on GitHub.
2. In [hPanel](https://hpanel.hostinger.com) → **Websites** → select the site →
   **Advanced** → **Git** → connect this repo (`SMBeePay/uglyducklingrestorations`),
   branch `main`, directory `public_html`.
3. After pushing new commits, click **Deploy** in hPanel (or enable auto-deploy).
4. In hPanel → **Domains**, point uglyducklingrestorations.com at this website.

## Branches

Development happens on `claude/ugly-duckling-restorations-site-9854sl`. Merge into
`main` when ready to go live, and point Hostinger's Git deployment at `main`.

## Placeholder info — replace before launch

- **Phone**: `(555) 555-0100` appears in the header, hero, contact section, and
  footer, plus the LocalBusiness schema in `index.html`. Search for
  `555-555-0100` / `5555550100` to find every occurrence.
- **Email**: `hello@uglyducklingrestorations.com` is used throughout and in
  `contact-handler.php`'s `$recipient` — this only works once that inbox actually
  exists on the domain.
- **Hours**: Mon–Fri 9am–5pm, Sat 10am–2pm is a placeholder guess — adjust to the
  real schedule.

## Images

There are no real product photos yet, so the About and Gallery sections use
Unsplash stock photography of solid wood furniture in the meantime, credited
below per the [Unsplash License](https://unsplash.com/license) (free for
commercial use, attribution not legally required but credited as good practice).
The gallery note tells visitors these are representative, not the shop's own
completed work yet.

- **About section** (`images/about/restorer-detail.jpg`/`.webp`): drawer hardware
  close-up. Photo by Julian Hochgesang on Unsplash.
- **Gallery** (`images/gallery/`): `dresser-case-pieces` (photo by Alberto Bigoni),
  `cabinets-hutches` (photo by Liana S), `chairs-seating` (photo by Marina Zvada) —
  all on Unsplash.

**Replace these with real photos as they become available** — actual completed
restorations are a much stronger trust signal than stock photography once you
have them. Drop new images into `images/about/` or `images/gallery/` and update
the `<img src>`/`srcset` in `index.html` to match; keep the about photo close to
a 4:5 crop and gallery photos close to 4:3 so they fill their frames cleanly.

## Brand assets

Logo and color/type system come from the supplied brand book (`EVERY PIECE HAS
POTENTIAL`, charcoal/taupe/sage/gold/cream palette, Playfair Display + Montserrat).

**`images/brand/`** — web-ready files actually referenced by the site:
- `icon-header.png` / `.webp` — cropped duckling-and-swan submark (no text),
  used in the header and footer lockups, **with a true transparent background**
  (see note below) — reads cleanly on both the cream header and the charcoal
  footer
- `logo-badge.png` / `.webp` — full primary arched badge, transparent background,
  used in the hero
- `favicon.ico`, `favicon-16.png`, `favicon-32.png`, `favicon-180.png`,
  `favicon-512.png` — generated from the submark
- `og-image.jpg` — 1200×630 social share image (badge flattened onto cream,
  since social previews need an opaque image)

**Background note**: the original approved PNG exports in `brand-assets/` are
RGBA but have an *opaque* near-white background baked in (not real transparency),
so dropping them directly onto a colored background shows a faint white box.
The files in `images/brand/` were reprocessed to make that background genuinely
transparent (near-white pixels connected to the edge were removed via a flood
fill, so the eye highlight and other enclosed light details inside the mark were
left alone). If new logo exports come from the designer later, check for this
same issue before reusing them on anything other than a white/cream background.

**`brand-assets/`** — the original approved logo exports as supplied (master PNG,
1080/2000/3000px PNGs, 2000px JPG, 512px PNG). Kept for print, signage, or
merchandise use; not linked from any page.

## SEO / local search

- `LocalBusiness` JSON-LD in `index.html` sets `areaServed` to a 25-mile
  `GeoCircle` around Royse City, TX (32.9743, -96.3327).
- Service-area copy lists nearby cities: Rockwall, Fate, Caddo Mills, Wylie,
  McKinney, Princeton, Farmersville, Nevada, Josephine, Lavon, Terrell.
- Next steps once live: claim/build out the Google Business Profile, start
  collecting reviews, set up Google Search Console and submit `sitemap.xml`.
