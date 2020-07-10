from pathlib import Path
import strictyaml as yaml
from os import listdir
from os.path import isfile, join

# i.e.: 0680b520-02a2-440f-953c-fcec27740a45
uuidv4_regex = r"[0-9a-f]{8}\-[0-9a-f]{4}\-4[0-9a-f]{3}\-[89ab][0-9a-f]{3}\-[0-9a-f]{12}"

# i.e.: 2016-10-22T14:23:12+00:00
atomic_datetime_regex = r"\d{4}\-(0[1-9]|1[0-2])\-(0[1-9]|[1-2]\d|3[0-1])T[0-2]\d:[0-5]\d:[0-5]\d[+-][0-2]\d:[0-5]"


OFFENDER_SCHEMA = yaml.Map({
    'uuid': yaml.Regex(uuidv4_regex),
    'name': yaml.Str(),
    'social_media': yaml.Map({
        yaml.Optional('twitter'): yaml.Seq(
            yaml.Map({
                'user_id': yaml.Int(),
                'handle': yaml.Str()
            })
        ),
        yaml.Optional('websites'): yaml.Seq(yaml.Str())
    }),
    'counts': yaml.Seq(
        yaml.Map({
            'name': yaml.Str(),
            'type': yaml.Str(),
            'subtype': yaml.Str(),
            'source': yaml.Map({
                'live_url': yaml.Url(),
                'archive_url': yaml.Url(),
                'incident_time': yaml.Regex(atomic_datetime_regex),
                'reported_time': yaml.Regex(atomic_datetime_regex),
                'type': yaml.Str()
            }),
            yaml.Optional('transcript'): yaml.Str(),
            'summary': yaml.Str(),
            yaml.Optional('response'): yaml.Map({
                'live_url': yaml.Url(),
                'archive_url': yaml.Url(),
                'apology_time': yaml.Datetime(),
                'description': yaml.Str()
            })
        })
    )
})

mypath = 'database/offenders/'
offender_yamls = [f for f in listdir(mypath) if isfile(join(mypath, f))]
for offender_yaml in offender_yamls:
    try:
        offender = yaml.load(Path(mypath + offender_yaml).read_text(), OFFENDER_SCHEMA)
    except yaml.YAMLError as error:
        print(error)
