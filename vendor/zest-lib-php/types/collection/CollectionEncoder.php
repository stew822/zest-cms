    function addRecord( $name ): ActiveRecord {
        $recordLocation = $this->location."/".$name;
        if( mkdir( $recordLocation ) ) {
            $record = new ActiveRecord( $recordLocation );
            $this->records[] = $record;
            return $record;
        }
        else {
            die( "zest could not make Record at $recordLocation" );
        }
    }